var todo_list = "";
var splt = '<<❤splt❤>>';
var cookie = getCookie('todoList');

function ft_prompt() {
    var ret = prompt("Please provide a new task:");
    if (ret && ret.length > 0)
        ft_new_task(ret);
}
function ft_new_task(task_prompt) {
    var td_list =  document.getElementById("ft_list");
    todo_list = todo_list + task_prompt + splt;
    var new_task = document.createElement("div");
    new_task.setAttribute("id", "task");
    new_task.addEventListener("click", function ft_delete() {
        if (confirm("Are you sure you've done with this ?")) {
            new_task.remove();
            setCookie('todoList', todo_list.replace(task_prompt + splt, ''), 30);
        }});
    var task_text = document.createTextNode(task_prompt);
    new_task.appendChild(task_text);
    td_list.insertBefore(new_task, td_list.childNodes[1]);
    setCookie('todoList', todo_list, 30);
}

window.onload = () => {
    if (cookie) {
      todo_list = cookie.split(splt);
      todo_list.pop();
      todo_list.forEach(function(todo) {
        ft_new_task(todo);
      });
      todo_list = cookie;
      setCookie('todoList', todo_list, 30);
    }
  }

function setCookie(cname, cvalue, exmin) {
    var d = new Date();
    d.setTime(d.getTime() + (exmin * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + "";
  }

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return 0;
}