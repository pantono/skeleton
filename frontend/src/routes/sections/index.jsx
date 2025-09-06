import {lazy} from 'react';
import Login from "../../pages/auth/login.jsx";

const Page404 = lazy(() => import('src/pages/error/404'));

export const routesSection = [
    {
        path: '/',
        element: <div>Index</div>,
    },
    {
        path: '/login',
        element: <Login/>,
    },
    // No match
    {path: '*', element: <Page404/>},
];
