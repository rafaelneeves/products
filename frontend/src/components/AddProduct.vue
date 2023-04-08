<template>
    <div class="submit-form">
        <div v-if="!submitted">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" required v-model="product.name" name="name" />
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <input class="form-control" id="description" required v-model="product.description" name="description" />
            </div>

            <div class="form-group">
                <label for="price">Preço</label>
                <input class="form-control" id="price" required v-model="product.price" name="price" />
            </div>

            <div class="form-group">
                <label for="category">Categoria</label>
                <input class="form-control" id="category" required v-model="product.category" name="category" />
            </div>

            <button @click="saveProduct" class="btn btn-success">Salvar</button>
        </div>

        <div v-else>
            <h4>Produto salvo com sucesso!</h4>
            <button class="btn btn-success" @click="newProduct">Novo Produto</button>
        </div>
    </div>
</template>
  
<script>
import ProductDataService from "../services/ProductDataService";

export default {
    name: "add-product",
    data() {
        return {
            product: {
                id: null,
                name: "",
                description: "",
                price: "",
                category: "",
                published: false
            },
            submitted: false
        };
    },
    methods: {
        saveProduct() {
            var data = {
                name: this.product.name,
                description: this.product.description,
                price: this.product.price,
                category: this.product.category,
            };

            ProductDataService.create(data)
                .then(response => {
                    this.product.id = response.data.id;
                    console.log(response.data);
                    this.submitted = true;
                })
                .catch(e => {
                    console.log(e);
                });
        },

        newProduct() {
            this.submitted = false;
            this.product = {};
        }
    }
};
</script>
  
<style>
.submit-form {
    max-width: 300px;
    margin: auto;
}
</style>