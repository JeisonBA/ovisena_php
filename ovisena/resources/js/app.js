/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
    data() {
        return {
            textoResponsable:"",
            responsable: [],
            textoRebano:"",
            rebano: [],
            textoOvino:"",
            ovino: [],
            textoAlimentacion:"",
            alimentacion: [],
            textoParto:"",
            parto: [],
            textoPesaje:"",
            pesaje: [],
            textoSalida:"",
            salida: [],
            textoSanidad:"",
            sanidad: [],
            // if de campos
            TipoSani:"",
            TipoRes:"",
            // variables de GDP
            gananciaP: 0.0,
            peso_actu: 0.0,
            peso_fin: 0.0
            // fin var
        }
    },
    methods: {

        // Funciones de GDP
        llenarOvinos(){
            axios.get('http://127.0.0.1:8000/consultarOvinos').then((respuesta)=>{
                this.ovino = respuesta.data
            })
        },

        cargarPesoActu(Id){
            this.ovino.forEach(element => {
                if (Id == element['Id_ovino']){
                    this.peso_actu = element['Peso_actual']
                    this.peso_fin = ""
                    this.gananciaP = ""
                }
            })
        },

        calcular_gananciaP(){
            this.gananciaP = this.peso_fin - this.peso_actu;
        },

        calcular_gananciaP_editar(){
            this.$refs.gananciaP.value = this.$refs.peso_fin.value - this.$refs.peso_actu.value;
        },
        // Fin funciones GDP
        
        alerta(){
            var alerta = confirm("Si el boton eliminar no funciona o no aparece, es porque el registro esta relacionado con otro formulario de datos!")
            },

        buscarResponsable(){
            if(this.textoResponsable.length > 0){

                axios.get('http://localhost:8000/buscarResponsable/'+this.textoResponsable).then((respuesta)=>{
                    this.responsable = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarResponsable/-').then((respuesta)=>{
                    this.responsable = respuesta.data
                });
            }
        },

        buscarRebano(){
            if(this.textoRebano.length > 0){

                axios.get('http://localhost:8000/buscarRebano/'+this.textoRebano).then((respuesta)=>{
                    this.rebano = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarRebano/-').then((respuesta)=>{
                    this.rebano = respuesta.data
                });
            }
        },

        buscarAlimentacion(){
            if(this.textoAlimentacion.length > 0){

                axios.get('http://localhost:8000/buscarAlimentacion/'+this.textoAlimentacion).then((respuesta)=>{
                    this.alimentacion = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarAlimentacion/-').then((respuesta)=>{
                    this.alimentacion = respuesta.data
                });
            }
        },

        buscarOvino(){
            if(this.textoOvino.length > 0){

                axios.get('http://localhost:8000/buscarOvino/'+this.textoOvino).then((respuesta)=>{
                    this.ovino = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarOvino/-').then((respuesta)=>{
                    this.ovino = respuesta.data
                });
            }
        },

        buscarSanidad(){
            if(this.textoSanidad.length > 0){

                axios.get('http://localhost:8000/buscarSanidad/'+this.textoSanidad).then((respuesta)=>{
                    this.sanidad = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarSanidad/-').then((respuesta)=>{
                    this.sanidad = respuesta.data
                });
            }
        },

        buscarSalida(){
            if(this.textoSalida.length > 0){

                axios.get('http://localhost:8000/buscarSalida/'+this.textoSalida).then((respuesta)=>{
                    this.salida = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarSalida/-').then((respuesta)=>{
                    this.salida = respuesta.data
                });
            }
        },

        buscarPesaje(){
            if(this.textoPesaje.length > 0){

                axios.get('http://localhost:8000/buscarPesaje/'+this.textoPesaje).then((respuesta)=>{
                    this.pesaje = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarPesaje/-').then((respuesta)=>{
                    this.pesaje = respuesta.data
                });
            }
        },

        buscarParto(){
            if(this.textoParto.length > 0){

                axios.get('http://localhost:8000/buscarParto/'+this.textoParto).then((respuesta)=>{
                    this.parto = respuesta.data
                });
            }else{
                console.log("Esta buscando todo")

                axios.get('http://localhost:8000/buscarParto/-').then((respuesta)=>{
                    this.parto = respuesta.data
                });
            }
        },
        
        eliminarAlimentacion(Id_alimentacion){
            var eliminar = confirm("¿Esta seguro que quiere eliminar esta alimentacion? :(")

            if (eliminar == true){
                axios.delete('http://localhost:8000/alimentacion/' + Id_alimentacion).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/alimentacion/"
                })
            }
        },

        eliminarOvino(Id_ovino){
            var eliminar = confirm("¿Esta seguro que quiere eliminar este ovino? :(")

            if (eliminar == true){
                
                axios.delete('http://localhost:8000/ovino/' + Id_ovino).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/ovino/"
                })
            }
        },

        eliminarParto(Id_parto){
            var eliminar = confirm("¿Esta seguro que quiere eliminar este parto? :(")

            if (eliminar == true){
                
                axios.delete('http://localhost:8000/parto/' + Id_parto).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/parto/"
                })
            }
        },

        eliminarPesaje(Id_pesaje){
            var eliminar = confirm("¿Esta seguro que quiere eliminar este pesaje? :(")

            if (eliminar == true){
                
                axios.delete('http://localhost:8000/pesaje/' + Id_pesaje).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/pesaje/"
                })
            }
        },

        eliminarRebano(Id_rebano){
            var eliminar = confirm("¿Esta seguro que quiere eliminar este rebaño? :(")

            if (eliminar == true){
                
                axios.delete('http://localhost:8000/rebano/' + Id_rebano).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/rebano/"
                })
            }
        },

        eliminarResponsable(Id_responsable){
            var eliminar = confirm("¿Esta seguro que quiere eliminar este responsable? :(")

            if (eliminar == true){
                
                axios.delete('http://localhost:8000/responsable/' + Id_responsable).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/responsable/"
                })
            }
        },

        eliminarSalida(Id_salida){
            var eliminar = confirm("¿Esta seguro que quiere eliminar esta salida? :(")

            if (eliminar == true){
                
                axios.delete('http://localhost:8000/salida/' + Id_salida).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/salida/"
                })
            }
        },

        eliminarSanidad(Id_sanidad){
            var eliminar = confirm("¿Esta seguro que quiere eliminar esta sanidad? :(")

            if (eliminar == true){
                
                axios.delete('http://localhost:8000/sanidad/' + Id_sanidad).then((respuesta) => {
                    console.log(respuesta.data)
                    window.location.href = "http://localhost:8000/sanidad/"
                })
            }
        },
    }
});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
