import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';

/**
 * Import your React components here
 */
import Example from './components/Example';
import Welcome from './components/Welcome';

/**
 * Mount Example component if element exists
 */
if (document.getElementById('example')) {
    createRoot(document.getElementById('example')).render(<Example />);
}

/**
 * Mount Welcome component if element exists
 */
if (document.getElementById('app')) {
    createRoot(document.getElementById('app')).render(<Welcome />);
}
