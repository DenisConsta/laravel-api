import { ApiService } from "../services/api.service";
import { store } from "./store";

export function apiSearch(string) {
    ApiService.getApi('projects/search', { tosearch: string });
    store.lastSearch = string;
    store.lastUrl = `http://127.0.0.1:8000/api/projects/search/?tosearch=${string}`;
}


export function nextPrev(dir) {
    if (dir)
        ApiService.getApi(store.pagination.last_route, {
            page: ++store.pagination.current_page,
            tosearch: store.lastSearch,
        });
    else
        ApiService.getApi(store.pagination.last_route, {
            page: --store.pagination.current_page,
            tosearch: store.lastSearch,
        });
}
