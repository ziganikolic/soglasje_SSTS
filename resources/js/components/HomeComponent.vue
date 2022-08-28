<template>
<div>
    <div v-if="isVisible" class="z-50 fixed show inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div  id="popup-modal" tabindex="0" class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-2 bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-end p-2">
                        <button @click="close()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-2 pt-0 text-center">
                        <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                        <button @click="deleteContract()" data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button @click="close()"  data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                        >No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="flex justify-center">
        <div class="w-11/12 md:w-8/12 lg:w-7/12 bg-whiteææ rounded-lg">
<!--<div class="w-11/12 md:w-8/12 lg:w-7/12 bg-white  lg:p-20 rounded-lg">-->
            <div class="overflow-hidden overflow-x-auto w-full align-middle sm:rounded-md">


            </div>
            <div class="p-4">
                <h1 class="font-light">Ime in priimek: <b class="font-bold text-sm md:text-lg lg:text-lg">{{ userData['name'] }} {{ userData['surname'] }}</b></h1>
                <h1 class="font-light">Email: <b class="font-bold text-sm md:text-lg lg:text-lg">{{ userData['email'] }} </b></h1>
                <h1 class="font-light">Razred: <b class="font-bold text-sm md:text-lg lg:text-lg">{{ userData['class'] }}</b></h1>
            </div>


            <!-- <div class="accordion" id="accordionExample"
            v-for="item in kategorije"
                      :key="id"
            > -->

            <!-- </div> -->

            <!-- <h1>{{ soglasje[0]['ime'] }} {{ soglasje[0]['priimek'] }}</h1> -->
            <div v-if="soglasjeObstaja" class="accordion" id="accordionExample" >
                <div class="accordion-item bg-white border border-gray-200"
                     v-for="item in category"
                     :key="item.id">

                    <h2 class="accordion-header mb-0" :id="['#index' + item.id ]">

                        <button class="
                            accordion-button
                            collapsed
                            relative
                            flex
                            items-center
                            w-full
                            py-lg-4
                            px-lg-5
                            text-base text-gray-800 text-left
                            bg-white
                            border-0
                            rounded-none
                            transition
                            focus:outline-none
                            text-xs
                            md:text-base"
                                @click="changeIndex(item.id), getKategorija(index)"
                                type="button" data-bs-toggle="collapse" v-bind:data-bs-target="['#index' + item.id ]" aria-expanded="false"
                                :aria-controls="['#index' + item.id ]">
                            {{ item.category_name }}
                        </button>
                    </h2>
                    <div :id="['index'+ item.id]" class="accordion-collapse collapse" :aria-labelledby="['#index' + item.id ]"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body md:py-4 md:px-5">

                            <table class="w-full border divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50"><span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                                            Privolitev</span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50">
                                            <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                                                izbira</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    <tr class="bg-white"  v-for="(permission, key) in category[index]['permissions']"
                                        :key="permission.id">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ permission.permission_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <span v-if=" choice[key] == true" class="bg-green-100 text-green-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">DA</span>
                                            <span v-if=" choice[key] == false" class="bg-red-100 text-red-800 text-xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">NE</span>
                                            <span v-if=" choice[key] == null" class="text-center bg-yellow-100 text-yellow-800 text-xs font-semibold  px-0.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">NI DOLOČENO</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">

                <!-- Modal toggle -->
                <button v-if="soglasjeObstaja" class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-4" type="button" data-modal-toggle="popup-modal"
                        @click="open()"
                >
                    IZBRIŠI SOGLASJE
                </button>
            </div>


            <!-- <router-link :to="{ name: 'dashboard.index' }"><button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full float-left">
                    NAZAJ
            </button > </router-link> -->

            <div v-if="soglasjeObstaja == false" class="text-center mb-8">
                <h1>Vaše soglasje ne obstaja <br> prosimo vas, da izpolnite soglasje s klikom na povezavo <br>
                    <a href="/contract" class="text-blue-500">TUKAJ</a>
                </h1>
            </div>
        </div>
    </div>

    <h1></h1>
</div>
</template>

<script>

import { onMounted } from "vue";
import { ref } from 'vue'
import axios from 'axios';
import axiosClient from "../axios/axios";




export default {

    props: ['user'],

    data () {
        return {
            count: 11,  //11 je število vseh kategorij
            index: 1,   //števec za pomikanje po kategorijah
            categoryIndex: 0,
            choice: [],
            userID: '',
            userData: [],

            isDeleted: false,
            isVisible: false,
            soglasjeObstaja: true,

            contract_status:null,

            catrgory: [],

            stanje: null,
        };
    },


    setup(){
        const category = ref('')


        const loadData = async () =>{
            try{
                const response = await axios.get('/contract_questions')

                category.value = response.data.data.category;


            } catch (err){
                console.log(err)
            }
        }
        loadData()

        return {
            category,

        }
    },


    methods:{
        changeIndex(key){

            this.categoryIndex = key
            this.index = key - 1

        },

        getKategorija(index){
            if (this.choice.length != 0){
                this.choice = []

            };
            this.contract_status.forEach((permission) => {
                if(permission.category_id == this.categoryIndex){
                    console.log(permission.choice);
                    this.choice.push(permission.choice)
                };

            });

        },

        open() {
            this.isVisible = true
        },

        close() {
            this.isVisible = false
        },


        deleteContract(){
            this.isVisible = false
            this.userID = this.user.id
            axios.delete(`/contract_status/delete/${this.userID}`,{
                headers: {
                    'Content-Type': 'aplication/json',
                    'Accept' : 'aplication/json',
                    'app-token' : 'base64:VYfyAbTkMgHOZ68zh0W8baEEzCW49ZQHc4fev9fgy08=',
                }

            }).then(function (response) {
                if (response){
                    window.location.reload()
                }
            })
                .catch(function (err) {
                    console.log('Error', err)
                })
            this.isDeleted = true

        },
    },


    created() {
        this.userID = this.user.id
        axios.get(`/contract_status/${this.userID}`).then((response) => {
            this.contract_status = response.data.data.user[0].contract_status
            this.userData = response.data.data.user[0]

            if(this.contract_status.length != 0){
                this.soglasjeObstaja = true
            }
            else{
                this.soglasjeObstaja = false
            }
        })
    },


}
</script>






