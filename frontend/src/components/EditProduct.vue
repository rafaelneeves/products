<template>
    <div v-if="currentProduct" class="edit-form">
        <h4>Produto Editar</h4>
        <form>
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" v-model="currentProduct[0].name" />
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" id="description" v-model="currentProduct[0].description" />
            </div>

            <div class="form-group">
                <label for="price">Preço</label>
                <input type="text" class="form-control" id="price" v-model="currentProduct[0].price" />
            </div>

            <div class="form-group">
                <label for="category">Categoria</label>
                <input type="text" class="form-control" id="category" v-model="currentProduct[0].category" />
            </div>


        </form>

        <button type="submit" class="btn btn-success" @click="updateProduct">
            Atualizar
        </button>
        <p>{{ message }}</p>
    </div>

    <div v-else>
        <br />
        <p>Aguarde...</p>
    </div>
</template>
  
<script>
import ProductDataService from "../services/ProductDataService";

export default {
    name: "product",
    data() {
        return {
            currentProduct: null,
            message: ''
        };
    },
    methods: {
        getProduct(id) {
            ProductDataService.get(id)
                .then(response => {
                    this.currentProduct = response.data;
                    console.log(response.data);
                })
                .catch(e => {
                    console.log(e);
                });
        },

        updateProduct() {
            var nameInput = document.getElementById("name");
            var descriptionInput = document.getElementById("description");
            var priceInput = document.getElementById("price");
            var categoryInput = document.getElementById("category");

            var data = {
                name: nameInput.value,
                description: descriptionInput.value,
                price: priceInput.value,
                category: categoryInput.value,
            };

            ProductDataService.update(this.currentProduct[0].id, data)
                .then(response => {
                    console.log(response.data);
                    this.message = 'Produto Atualizado com sucesso!';
                })
                .catch(e => {
                    console.log(e);
                });
        }
    },
    mounted() {
        this.message = '';
        this.getProduct(this.$route.params.id);
    }
};
</script>
<style>
.edit-form {
    max-width: 300px;
    margin: auto;
}
</style>