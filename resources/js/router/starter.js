import { createRouter, createWebHashHistory } from "vue-router";
import LandingView from '@/views/landing/LandingView.vue';
import ReminderView from '@/views/auth/ReminderView.vue';
import SignUpView from '@/views/auth/SignUpView.vue';

import NProgress from "nprogress/nprogress.js";

// Main layouts
import LayoutBackend from "@/layouts/variations/BackendStarter.vue";
import LayoutSimple from "@/layouts/variations/Simple.vue";

// Error views
const Error400 = () =>
    import ("@/views/errors/400View.vue");
const Error401 = () =>
    import ("@/views/errors/401View.vue");
const Error403 = () =>
    import ("@/views/errors/403View.vue");
const Error404 = () =>
    import ("@/views/errors/404View.vue");
const Error500 = () =>
    import ("@/views/errors/500View.vue");
const Error503 = () =>
    import ("@/views/errors/503View.vue");

// Frontend: Landing
const Landing = () =>
    import ("@/views/starter/LandingView.vue");

// Backend: Dashboard
const Dashboard = () =>
    import ("@/views/starter/DashboardView.vue");

// Frontend: Login
const SignIn = () =>
    import ("@/views/auth/SignInView.vue");

// Set all routes
const routes = [{
        path: "/",
        component: LayoutSimple,
        children: [{
            path: "",
            name: "landing",
            component: LandingView,
        }, ],
    },
    {
        path: "/auth",
        component: LayoutSimple, // Assuming you want to use the same layout for auth routes
        children: [{
                path: "login",
                name: "login",
                component: SignIn,
            },
            {
                path: 'reminder',
                name: 'auth-reminder',
                component: ReminderView,
            },
            {
                path: 'signup',
                name: 'auth-signup',
                component: SignUpView,
            },
        ],
    },
    {
        path: "/backend",
        redirect: "/backend/dashboard",
        component: LayoutBackend,
        children: [{
            path: "dashboard",
            name: "backend-dashboard",
            component: Dashboard,
        }, ],
    },
    // Error routes
    {
        path: "/error/400",
        name: "error-400",
        component: Error400,
    },
    {
        path: "/error/401",
        name: "error-401",
        component: Error401,
    },
    {
        path: "/error/403",
        name: "error-403",
        component: Error403,
    },
    {
        path: "/error/404",
        name: "error-404",
        component: Error404,
    },
    {
        path: "/error/500",
        name: "error-500",
        component: Error500,
    },
    {
        path: "/error/503",
        name: "error-503",
        component: Error503,
    },
    {
        path: '/:catchAll(.*)',
        name: 'NotFound',
        component: Error404
    }
];

// Create Router
const router = createRouter({
    history: createWebHashHistory(),
    linkActiveClass: "active",
    linkExactActiveClass: "active",
    scrollBehavior() {
        return { left: 0, top: 0 };
    },
    routes,
});

// NProgress
/*eslint-disable no-unused-vars*/
NProgress.configure({ showSpinner: false });

router.beforeResolve((to, from, next) => {
    NProgress.start();
    next();
});

router.afterEach((to, from) => {
    NProgress.done();
});
/*eslint-enable no-unused-vars*/

export default router;