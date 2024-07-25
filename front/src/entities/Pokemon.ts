import api from "~/src/infra/api";
import type {AxiosResponse} from "axios";

export interface Pokemon {
    id: number;
    name: string;
    height: number;
    weight: number;
    types: string;
}

export interface PokemonList {
    data: Pokemon[]
}

class PokemonEntity {
    list = async (page: number) => {
        console.log(page);
        return await api.get('http://localhost/api/pokemon', {
            params: {
                page
            }
        }).then((res: AxiosResponse<PokemonList>) => JSON.parse(res.data));
    }
}

export const Pokemon = new PokemonEntity();