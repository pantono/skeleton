import {StrictMode} from 'react';
import {createRoot} from 'react-dom/client';
import {Outlet, RouterProvider, createBrowserRouter} from 'react-router';
import App from "./app.jsx";
import {ErrorBoundary} from "./routes/components/index.js";
import {routesSection} from "./routes/sections/index.jsx";


const root = createRoot(document.getElementById('root'));
const router = createBrowserRouter([
    {
        Component: () => (
            <App>
                <Outlet />
            </App>
        ),
        errorElement: <ErrorBoundary />,
        children: routesSection,
    },
]);

root.render(
    <StrictMode>
        <RouterProvider router={router}/>
    </StrictMode>
);
