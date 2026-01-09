<template>
    <div class="layout">
    <SideNav />
    <main>
        <div class="message-title">
            <h3>ホーム</h3>
        </div>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <div class="post-header">
                    <span class="user-name">{{ post.name }}</span>
                    <button class="like-button">♥</button>
                    <span class="like-count">{{ post.likes_count }}</span>
                    <button class="delete-button">×</button>
                    <NuxtLink to="/comment/">→</NuxtLink>
                </div>
                <p class="post-message">{{ post.message }}</p>
            </li>
        </ul>
    </main>
    </div>
</template>

<script setup>
const posts = [
    {
        id: 1,
        name: 'dami1',
        message: '初めての投稿',
        likes_count:3
    }
    ]
</script>