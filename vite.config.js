import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  base: '/platepal/major/ai/', // Update this to match the new path
  plugins: [react()],
});
