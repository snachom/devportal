<?php
/**
 * @copyright Copyright (c) 2014 Carsten Brandt
 * @license https://github.com/cebe/markdown/blob/master/LICENSE
 * @link https://github.com/cebe/markdown#readme
 */

namespace Drupal\Tests\ghmarkdown\Unit;

use Drupal\ghmarkdown\cebe\markdown\Markdown;

/**
 * Test case for traditional markdown.
 *
 * @author Carsten Brandt <mail@cebe.cc>
 * @group ghmarkdown
 */
class MarkdownTest extends BaseMarkdownTest {
  public function createMarkdown() {
    return new Markdown();
  }

  public function getDataPaths() {
    return [
      'markdown-data' => __DIR__ . '/markdown-data',
    ];
  }

  public function testEdgeCases() {
    $this->assertEquals("<p>&amp;</p>\n", $this->createMarkdown()->parse('&'));
    $this->assertEquals("<p>&lt;</p>\n", $this->createMarkdown()->parse('<'));
  }

  public function testKeepZeroAlive() {
    $parser = $this->createMarkdown();

    $this->assertEquals("0", $parser->parseParagraph("0"));
    $this->assertEquals("<p>0</p>\n", $parser->parse("0"));
  }

  public function testAutoLinkLabelingWithEncodedUrl() {
    $parser = $this->createMarkdown();

    $utfText = "\xe3\x81\x82\xe3\x81\x84\xe3\x81\x86\xe3\x81\x88\xe3\x81\x8a";
    $utfNaturalUrl = "http://example.com/" . $utfText;
    $utfEncodedUrl = "http://example.com/" . urlencode($utfText);

    $this->assertStringEndsWith(">{$utfNaturalUrl}</a>", $parser->parseParagraph("<{$utfNaturalUrl}>"), "Natural UTF-8 URL needs no conversion.");
    $this->assertStringEndsWith(">{$utfNaturalUrl}</a>", $parser->parseParagraph("<{$utfEncodedUrl}>"), "Encoded UTF-8 URL will be converted to readable format.");
    // See: \cebe\markdown\inline\LinkTrait::renderUrl
  }
}