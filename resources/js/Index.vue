<template>
    <div>
        <nav class="navbar bg-white border-bottom navbar-light px-2">
            <router-link :to="{name: 'home'}" class="navbar-brand mr-auto">Laravel BnB</router-link>
            <router-link :to="{name: 'second'}" class="btn nav-button">Second</router-link>
        </nav>

        <div class="container mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
    </div>
</template>