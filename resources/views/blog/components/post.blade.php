<style>
    .post {
        display: grid;
        grid-template-rows: 10% 87% 13%;
        border: 1px solid #ededed;
        /*border-radius: 3px;*/
        padding: 4px;
        width: 500px;
        height: 500px;
        box-shadow: 1px 1px 1px #dededf;
        background-color: white;
    }

    .post .title {
        display: flex;
        text-decoration: none;
        justify-content: space-between;
        padding: 5px;
        border-bottom: 1px solid #dededf;
    }

    .post .title a {
        color: black;
        text-decoration: none;
    }

    .post .text {
        padding-top: 10px;
    }

    .post .status-bar {
        grid-row: 3;
        border-top: 1px solid #dededf;
        font-size: .8em;
    }
</style>

<div class="post">
    <div class="title">
        <a href="{{ route('post', ['id' => $postID]) }}">{{ $title }}</a>
        <span class="author">{{ $author }}</span>
    </div>
    <div class="text">{{ $text }}</div>
    <div class="status-bar">{{ $datetime }}</div>
</div>
