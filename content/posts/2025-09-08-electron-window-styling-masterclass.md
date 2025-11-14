---
{
  "title": "Electron Window Styling Masterclass",
  "slug": "electron-window-styling-masterclass",
  "date": "2025-09-08",
  "platforms": ["electron", "desktop"],
  "tags": ["electron", "css", "desktop-ui"],
  "summary": "Engineer frameless, transparent, and custom-shaped Electron windows without sacrificing usability.",
  "description": "Create production-grade Electron window chrome with CSS: draggable regions, glassmorphism, cross-platform fallbacks, and accessibility.",
  "author": "CSS Kitsune",
  "reading_time": 14
}
---
# Electron Window Styling Masterclass

Electron gives you a blank canvas. CSS decides whether it feels like a polished desktop app or a glorified web view. Let's build a frameless layout that respects Windows, macOS, and Linux conventions.

## Frameless Window Setup

Enable frameless mode in `BrowserWindow` while keeping context menus and devtools available during development:

```js
const window = new BrowserWindow({
  width: 1280,
  height: 800,
  frame: false,
  titleBarStyle: 'hiddenInset',
  backgroundColor: '#12131a',
  vibrancy: 'under-window',
  webPreferences: {
    preload: path.join(__dirname, 'preload.js')
  }
});
```

## Drag Regions with CSS

```css
.window-chrome {
  -webkit-app-region: drag;
  display: grid;
  grid-template-columns: 1fr auto;
  align-items: center;
  padding: 8px 16px;
  backdrop-filter: blur(24px);
  background: linear-gradient(135deg, rgba(18, 19, 26, 0.65), rgba(32, 34, 42, 0.35));
}

.window-controls {
  -webkit-app-region: no-drag;
  display: flex;
  gap: 12px;
}
```

## Cross-Platform Control Layout

```css
.window-btn {
  width: 14px;
  height: 14px;
  border-radius: 50%;
  border: none;
  transition: transform 120ms ease;
}

.window-btn.close { background: #ff5f57; }
.window-btn.minimize { background: #febc2e; }
.window-btn.maximize { background: #28c840; }

@media (prefers-color-scheme: dark) {
  .window-btn { filter: saturate(1.2); }
}
```

## Glassmorphism Without Overdraw

- Prefer `backdrop-filter` over semi-transparent PNGs
- Cap blur at 24px to avoid GPU spikes
- Provide a solid-color fallback for Linux distributions without blur support

## Accessibility Considerations

- Maintain a keyboard-accessible title bar (`tabindex="-1"` on drag regions, but ensure focusable controls)
- Respect `prefers-reduced-motion` on hover/focus transitions
- Color contrast: ensure control icons meet WCAG 4.5:1 ratios

## Packaging Tips

Bundle window chrome as a reusable component. Export tokens via CSS variables so teams can re-skin the chrome for different brands without touching layout logic.

Electron lets you break UI rules; this masterclass helps you rewrite them responsibly.
