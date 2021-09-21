// 1. Define route components.
// These can be imported from other files
import Home from './views/Home';
import PostIndex from './pages/posts/Index';
import About from './pages/About';

// 2. Define some routes
// Each route should map to a component.
// We'll talk about nested routes later.
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/posts',
        name: 'posts',
        component: PostIndex
    },
    {
        path: '/about',
        name: 'about',
        component: About
    }
];

// Export const routes in file app.js
export default routes;