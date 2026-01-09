<template>
    <SideNav />
    <main>
        <div class="comment-title">コメント</div>
        <ul>
            <li>
                <div class="comment-header">
                    <span class="comment-name">{{ post.name }}</span>
                </div>
                <p class="post-message">{{ post.message }}</p>
            </li>
        </ul>
    </main>
</template>

<script setup>
const post ={
        id: 1,
        name: 'dami1',
        message: '初めてのコメント',
    }
</script>