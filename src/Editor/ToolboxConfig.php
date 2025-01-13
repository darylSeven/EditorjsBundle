<?php

namespace Tbmatuka\EditorjsBundle\Editor;

class ToolboxConfig
{
    /**
     * @var string|null
     */
    private ?string $title;

    /**
     * @var string|null
     */
    private ?string $icon;

    public function __construct(
        ?string $title = null,
        ?string $icon = null
    ) {
        $this->title = $title;
        $this->icon = $icon;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }
}
