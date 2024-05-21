<h1>:) Todo</h1>

<p>{{= hello() }}</p>

<h2>Set at ResourceObject</h2>
<p>id: {{= $todo['id'] }}</p>
<p>title: {{= $todo['title'] }}</p>

<h2>Get from QiqHelper</h2>
{{ $todoItem = todoItem() }}
<p>id: {{= $todoItem['id'] }}</p>
<p>title: {{= $todoItem['title'] }}</p>
