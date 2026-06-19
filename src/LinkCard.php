<?php

namespace App\Render;

class LinkCard
{
    private string $title;
    private string $description;
    private string $url;
    private string $keyword;

    public function __construct(
        string $title = '',
        string $description = '',
        string $url = '',
        string $keyword = ''
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->keyword = $keyword;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function setKeyword(string $keyword): self
    {
        $this->keyword = $keyword;
        return $this;
    }

    public function render(): string
    {
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $escapedDesc = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
        $escapedKeyword = htmlspecialchars($this->keyword, ENT_QUOTES, 'UTF-8');

        $html = '<div class="link-card">';
        $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">';
        $html .= '<div class="link-card-content">';
        $html .= '<h3 class="link-card-title">' . $escapedTitle . '</h3>';
        $html .= '<p class="link-card-desc">' . $escapedDesc . '</p>';
        if (!empty($escapedKeyword)) {
            $html .= '<span class="link-card-keyword">关键词：' . $escapedKeyword . '</span>';
        }
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;
    }

    public static function createDefault(): self
    {
        return new self(
            '麻将胡了 - 精品游戏',
            '探索经典麻将玩法，体验竞技乐趣。',
            'https://portal-mahjonghu.com',
            '麻将胡了'
        );
    }

    public function renderWithDefault(): string
    {
        $card = self::createDefault();
        return $card->render();
    }
}