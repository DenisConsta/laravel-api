import axios from "axios";
import { store } from "../data/store";
import { basicUrl } from "../data/data";

export class ApiService {

    static getApi(route, para) {
        console.log(para);
        return axios
            .get( `${basicUrl}${route}/` , {
                params:{
                    page: para.page,
                    tosearch: para.tosearch,
                }
            })
            .then((res) => {
                console.log(res);

                if(res.data.technologies)
                    store.technologies = res.data.technologies;

                if(res.data.types)
                    store.types = res.data.types;

                store.projects = res.data.projects.data;

                /* paginatation */
                store.pagination.last_route = route;
                store.pagination.current_page = res.data.projects.current_page;
                store.pagination.last_page = res.data.projects.last_page;

                console.log(`${basicUrl}${route}/`);
                console.log(store.projects);
                console.log(store.pagination);

                /* store.tosearch = ''; */
            })
            .catch((error) => {
                console.log(error);
            });
    }
}
