<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Edita tú nota</h3>
                            <p class="text-sm text-gray-600">Si editas, no podrás volver al diseño anterior</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                           <form @submit.prevent="submit">
                               <label class="block font-medium text-sm text-gray-700">
                                   Resumen
                               </label>
                               <textarea 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.excerpt">
                               </textarea>
                               <label class="block font-medium text-sm text-gray-700">
                                   Contenido
                               </label>
                               <textarea 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.content"
                                    rows="8">
                               </textarea>
                               <button 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                                    >Editar</button>
                           </form>
                           <hr class="my-5">
                           <a href="#" @click.prevent="destroy" class="bg-red-700 p-3 rounded-lg">
                               Eliminar nota
                           </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props: {
            note: Object, //Simple objeto, osea un unico registro a diferencia de un arreglo de objetos
        },
        data(){
            return{
                form:{
                    excerpt: this.note.excerpt,
                    content: this.note.content
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.put( this.route('notes.update', this.note.id), this.form )
                //this.form hace referencia a la variable que engloba tanto a content como excerpt
            },
            destroy() {
                if( confirm('¿Desea eliminar?') ){
                    this.$inertia.delete( this.route('notes.destroy', this.note.id) )
                }
            }
        }
    }
</script>
