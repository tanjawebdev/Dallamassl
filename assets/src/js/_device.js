/**
 * Device Detection Utility
 *
 * Provides a single source of truth for device/breakpoint checks.
 * Import in any component instead of duplicating breakpoint logic.
 *
 * Usage:
 *   import { isMobile, isTouch, onBreakpointChange } from './_device';
 *
 *   if (isMobile()) { ... }
 *   if (isTouch()) { ... }
 *
 *   onBreakpointChange(() => {
 *     if (isMobile()) { ... }
 *   });
 */

// Matches your SCSS $grid-breakpoints: lg: 992px
const BREAKPOINT_MOBILE = 992;

/**
 * Returns true if the current viewport is below the lg breakpoint.
 * Reactive: always reads the current window size.
 */
export function isMobile() {
    return window.matchMedia(`(max-width: ${BREAKPOINT_MOBILE - 1}px)`).matches;
}

/**
 * Registers a callback that fires whenever the mobile breakpoint is crossed.
 * Returns an unsubscribe function.
 *
 * @param {function} callback - Called with no arguments on breakpoint change.
 * @returns {function} Call this to remove the listener.
 *
 * Usage:
 *   const unsubscribe = onBreakpointChange(() => { ... });
 *   // later: unsubscribe();
 */
export function onBreakpointChange(callback) {
    const mq = window.matchMedia(`(max-width: ${BREAKPOINT_MOBILE - 1}px)`);
    const handler = () => callback();
    mq.addEventListener('change', handler);
    return () => mq.removeEventListener('change', handler);
}
