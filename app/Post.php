<?php

namespace App;

use App\Parsers\HashtagParser;
use Carbon\Carbon;
use Embera\Embera;
use Embera\Formatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use Privateer\Uuid\EloquentUuid;
use Spatie\Feed\FeedItem;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class Post extends Model implements FeedItem
{
    use EloquentUuid, HasSlug, HasTags, SoftDeletes;

    protected $fillable = ['title', 'markdown', 'excerpt', 'meta_title', 'meta_description'];

    protected $dates = ['published_at'];

    public static function boot()
    {
        parent::boot();

        self::saving( function($model) {
            // Oembed
            $embera = new Embera();
            $embera = new Formatter($embera);

            $embera->setTemplate('<div class="embed-{provider_name}">{html}</div>');

            $markdown = $embera->transform($model->markdown);

            // Set up a container for any hashtags that get parsed
            App::singleton('tagqueue', function() {
                return new TagQueue;
            });

            // Markdown
            $environment = Environment::createCommonMarkEnvironment();
            $environment->addInlineParser(new HashtagParser());
            $parser = new DocParser($environment);
            $htmlRenderer = new HtmlRenderer($environment);

            $text = $parser->parse($markdown);
            $model->html = $htmlRenderer->renderBlock($text);
        });

        self::saved( function($model) {
            // Handle hashtag syncing
            $model->syncTags(app('tagqueue')->getTags());
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function findByUrl($url)
    {
        return self::with('user')->where('url', $url)->firstOrFail();
    }

    public function scopePublished($query)
    {
        return $query->where('draft', false)
                    ->where('published_at', '<=', new Carbon);
    }

    public function scopeUnPublished($query)
    {
        return $query->where('draft', false)
            ->whereNull('published_at');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('url');
    }

    public static function getTagClassName(): string
    {
        return Tag::class;
    }

    public function getFeedItems()
    {
        return self::all();
    }

    public function getFeedItemId()
    {
        return $this->uuid;
    }

    public function getFeedItemTitle()
    {
        return $this->title;
    }

    public function getFeedItemUpdated()
    {
        return $this->updated_at;
    }

    public function getFeedItemSummary()
    {
        return $this->excerpt;
    }

    public function getFeedItemLink()
    {
        return url($this->url);
    }

    public function getFeedItemAuthor()
    {
        return $this->user->name;
    }
}
