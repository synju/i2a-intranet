import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import * as dotenv from 'dotenv';

dotenv.config();

export default defineConfig({
	plugins: [
		vue(),
		laravel({
			input: [
				'resources/css/app.css',
				'resources/js/app.js'
			],
			refresh: true, // Enables hot-reload for Laravel backend changes
		}),
	],
	css: {
		postcss: {},
	},
	server: {
		host: process.env.VITE_HOST || 'localhost', // Listen on all network interfaces
		port: parseInt(process.env.VITE_PORT, 10) || 3000, // Specify the port to listen on
	},
	build: {
		outDir: 'public', // Directory for built files
		emptyOutDir: true, // Clear the directory before building
		manifest: true, // Generate a manifest.json for Laravel
	},
});
