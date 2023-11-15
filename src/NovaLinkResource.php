<?php

namespace EricLagarda\NovaLinkResource;

use Laravel\Nova\Metable;
use Laravel\Nova\Tool;

class NovaLinkResource extends Tool
{
    use Metable;
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('NovaLinkResource::navigation', [
            'name' => $this->getMeta('name', 'Nova Link'),
            'to'   => $this->getMeta('to', '/'),
            'icon' => $this->getMeta('icon', null),
            'external' => $this->getMeta('external', false),
            'target' => $this->getMeta('target', '_self'),
        ]);
    }

    /**
     * Set the name link
     *
     * @param  string  $name
     *
     * @return array
     */
    public function name($name)
    {
        return $this->withMeta(['name' => $name]);
    }

    /**
     * Set the name link
     *
     * @param  string  $to
     *
     * @return array
     */
    public function to($to)
    {
        return $this->withMeta(['to' => $to]);
    }

    /**
     * @param string $icon
     *
     * @return array
     */
    public function icon(string $icon)
    {
        return $this->withMeta(['icon' => $icon]);
    }

    /**
     * @return mixed
     */
    private function getMeta(string $name, $default = null)
    {
        if (array_key_exists($name, $this->meta)) {
            return $this->meta[$name];
        }

        return $default;
    }
}
