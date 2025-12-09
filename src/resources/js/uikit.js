import { Livewire, Alpine } from '../../../../../../vendor/livewire/livewire/dist/livewire.esm';
import Anchor from '@alpinejs/anchor';
import Clipboard from '@ryangjchandler/alpine-clipboard';
import Collapse from '@alpinejs/collapse';
import Focus from '@alpinejs/focus';

Alpine.plugin(Anchor);
Alpine.plugin(Clipboard);
Alpine.plugin(Collapse);
Alpine.plugin(Focus);

Alpine.data('dropdown', () => ({
    open: false,
    trigger: {
        ['x-on:click']() { this.open = !this.open },
    },
    dialogue: {
        ['x-show']() { return this.open },
        ['x-on:click.away']() { this.open = false },
        ['x-on:click.stop']() { this.open = false },
    },
}));

Alpine.store('drawer', window.drawer);

Livewire.start();
