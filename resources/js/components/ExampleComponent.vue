<template>
    <v-app>
        <div class="text-xs-center">
            <v-menu offset-y>
                <v-btn
                    slot="activator"
                    color="green"
                    dark
                >
                    Dropdown
                </v-btn>
                <v-list>
                    <v-list-tile
                    v-for="(item, index) in items"
                    :key="index"
                    >
                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </div>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
        items: [
            { title: 'Click Me' },
            { title: 'Click Me' },
            { title: 'Click Me' },
            { title: 'Click Me 2' }
        ]
        }),
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
