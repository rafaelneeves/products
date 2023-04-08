<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(product, index) in products" :key="index">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.description }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.category }}</td>
                <router-link :to="'/Edit/' + product.id" class="badge badge-warning">Editar</router-link>
                &nbsp
                <button type="submit" class="badge badge-danger" @click="deleteProduct(product.id)">
                    Deletar
                </button>
            </tr>
        </tbody>
    </table>
</template>

<script>
import ProductDataService from "../services/ProductDataService.js";

export default {
    name: "products-list",
    data() {
        return {
            products: [],
            currentProduct: null,
            currentIndex: -1,
            title: ""
        };
    },
    methods: {
        retrieveProducts() {
            ProductDataService.getAll()
                .then(response => {
                    this.products = response.data;
                    console.log(response.data);
                })
                .catch(e => {
                    console.log(e);
                });
        },

        deleteProduct(id) {
            if (confirm("Você tem certeza que deseja excluir este produto?")) {
                ProductDataService.delete(id)
                    .then(response => {
                        console.log(response.data);
                        window.location.reload();
                    })
                    .catch(e => {
                        console.log(e);
                    });
            } else {
                window.location.reload();
            }
        }
    },
    mounted() {
        this.retrieveProducts();
    }
};
</script>
  
