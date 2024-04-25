<?php

declare(strict_types=1);

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use League\Plates\Engine;
use Nette\Neon\Neon;
use Nette\Utils\FileSystem;
use Nette\Utils\Finder;

// path constants
const CONTENT_PATH = __DIR__ . '/content';
const TEMPLATE_PATH = __DIR__ . '/templates';
const OUTPUT_PATH = __DIR__ . '/html';
const STATIC_PATH = __DIR__ . '/static';

// composer
require_once __DIR__ . '/vendor/autoload.php';

// functions
function config(): array
{
    return Neon::decodeFile(__DIR__ . '/config.neon');
}

// classes
class MarkdownParser
{
    public function getConverter()
    {
        // Configure the Environment with all the CommonMark parsers/renderers
        $environment = new Environment([
            'table_of_contents' => [
                'html_class' => 'table-of-contents',
                'position' => 'placeholder',
                'placeholder' => '[TOC]',
                'style' => 'bullet',
                'min_heading_level' => 1,
                'max_heading_level' => 6,
                'normalize' => 'relative',
            ],
        ]);
        $environment->addExtension(new CommonMarkCoreExtension())
            ->addExtension(new AttributesExtension())
            ->addExtension(new AutolinkExtension())
            ->addExtension(new GithubFlavoredMarkdownExtension())
            ->addExtension(new FrontMatterExtension())
            ->addExtension(new HeadingPermalinkExtension())
            ->addExtension(new TableOfContentsExtension());

        // Instantiate the converter engine and start converting some Markdown!
        $converter = new MarkdownConverter($environment);

        return $converter;
    }

    public function parse($markdown)
    {
        $parsed = $this->getConverter()->convert($markdown);

        $frontMatter = $parsed->getFrontMatter();
        $content = $parsed->getContent();

        return [
            'meta' => $frontMatter,
            'content' => $content
        ];
    }
}

class TemplateRenderer
{

    protected Engine $engine;

    public function __construct()
    {
        $this->engine = new Engine(TEMPLATE_PATH);
        $this->engine->registerFunction("meta", function () {
        });
    }

    public function render(string $template, array $data = []): string
    {
        return $this->engine->render($template, $data);
    }
}

class Commands
{
    public function build()
    {
        $parser = new MarkdownParser();
        $renderer = new TemplateRenderer();

        // delete output dir
        FileSystem::delete(OUTPUT_PATH);

        // copy static files
        FileSystem::copy(STATIC_PATH, OUTPUT_PATH);

        // create pages
        # get all pages
        $pages = Finder::findFiles('*.md')->from(CONTENT_PATH);

        foreach ($pages as $page) {
            $relative_path = $page->getRelativePathname();
            $file_path = $page->getPathname();
            $page = $parser->parse(FileSystem::read($file_path));
            $page['file_path'] = $file_path;
            $basename = basename($page['file_path'], '.md');
            $page['url'] = "/" . $basename . ".html";
            foreach ($page['meta'] as $key => $value) {
                $page[$key] = $value;
            }
            if (!isset($page['meta']['lang'])) {
                $page['lang'] = "en";
            }
            unset($page['meta']);
            $data = $page;
            if ($basename === 'index') {
                $data['pages'] = config()['page_index'][$page['lang']];
            }
            $html = $renderer->render('page', $data);

            FileSystem::write(
                OUTPUT_PATH . '/' . str_replace('.md', '', $relative_path) . '.html',
                $html
            );
        }

        echo "Build complete.\n";
    }
}

// ACTION.
$arg = $argv[1] ?? null;

if ($arg === null) {
    echo "No argument provided.\n";
    exit;
}

$commands = new Commands();

match ($arg) {
    'build' => $commands->build(),
    default => die("Unknown argument: $arg\n")
};
