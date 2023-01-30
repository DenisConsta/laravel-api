import axios from "axios";
import { store } from "../data/store";
import { basicUrl } from "../data/data";

export class ApiService {

    static getApi(route, uri) {
        let page = '';
        if(store.pagination.current_page != null)
            page = store.pagination.current_page;

        return axios
            .get( `${basicUrl}${route}/${uri}` , {
                params: {
                    page: page
                }
            })
            .then((res) => {
                store.projects = res.data.projects.data;
                store.pagination.current_page = res.data.projects.current_page;
                store.pagination.last_page = res.data.projects.last_page;
                console.log(store.pagination);
            })
            .catch((error) => {
                console.log(error);
            });
    }
}
