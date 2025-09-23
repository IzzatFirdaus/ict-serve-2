import { defineConfig } from '@playwright/test';

export default defineConfig({
    timeout: 60000, // Set global timeout for all tests to 60 seconds
    use: {
        baseURL: 'http://127.0.0.1:8000',
        actionTimeout: 60000, // Set action timeout to 60 seconds
    },
    testDir: './tests/e2e',
});
