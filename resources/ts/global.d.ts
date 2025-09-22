// TypeScript declaration for global showSwal helper

declare global {
    interface Window {
        showSwal: (...args: any[]) => any;
    }
}

export {};
