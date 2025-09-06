import {QueryClient, QueryClientProvider} from "@tanstack/react-query";
import {useEffect} from "react";
import {usePathname} from 'src/routes/hooks';

export default function App({children}) {
    useScrollToTop();
    const queryClient = new QueryClient({
        defaultOptions: {
            queries: {
                retry: false
            }
        }
    });
    return (
        <QueryClientProvider client={queryClient}>
            {children}
        </QueryClientProvider>
    )
}

function useScrollToTop() {
    const pathname = usePathname();

    useEffect(() => {
        window.scrollTo(0, 0);
    }, [pathname]);

    return null;
}
