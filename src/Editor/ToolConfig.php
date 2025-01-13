<?php

namespace Tbmatuka\EditorjsBundle\Editor;

class ToolConfig
{
    /**
     * @var string
     */
    private string $name = '';

    /**
     * @var string
     */
    private string $className = '';

    /**
     * @var string|null
     */
    private ?string $asset;

    /**
     * @var string|null
     */
    private ?string $shortcut;

    /**
     * @var bool|array|null
     */
    private array|bool|null $inlineToolbar = true;

    /**
     * @var ToolboxConfig|null
     */
    private ?ToolboxConfig $toolbox;

    /**
     * @var array
     */
    private array $config = [];

    /**
     * @param bool|array|mixed|null $inlineToolbar
     */
    public function __construct(
        string $name,
        string $className,
        ?string $asset = null,
        ?string $shortcut = null,
        $inlineToolbar = null,
        ?array $toolbox = [],
        ?array $config = []
    ) {
        $this->name = $name;
        $this->className = $className;
        $this->asset = $asset;
        $this->shortcut = $shortcut;

        if (!(
            $inlineToolbar === null ||
            is_bool($inlineToolbar) ||
            is_array($inlineToolbar)
        )) {
            throw new \InvalidArgumentException(sprintf('Invalid type for inlineToolbar: %s', get_class($inlineToolbar)));
        }

        $this->inlineToolbar = $inlineToolbar;

        if (is_array($toolbox)) {
            $this->toolbox = new ToolboxConfig(
                (isset($toolbox['title'])) ? $toolbox['title'] : null,
                (isset($toolbox['icon'])) ? $toolbox['icon'] : null
            );
        }

        if (is_array($config)) {
            $this->config = $config;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getAsset(): ?string
    {
        return $this->asset;
    }

    public function getShortcut(): ?string
    {
        return $this->shortcut;
    }

    /**
     * @return array|bool|null
     */
    public function getInlineToolbar()
    {
        return $this->inlineToolbar;
    }

    public function getToolbox(): ?ToolboxConfig
    {
        return $this->toolbox;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}
