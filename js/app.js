(function (Model) {
    var $form = document.querySelector("[x-todo-form]");
    var $inp = $form.querySelector("[x-todo-sr-inp]");
    var $list = document.querySelector("[x-todo-list]");
    var id = 0;

    var tmplTodoItem = function (todoObj) {
        return `
            <div x-todo-item="${todoObj.id}" class="todo--item">
                <span class="todo--item-text">${todoObj.value}</span>
                <button x-todo-action="delete" data-todo-id="${todoObj.id}">Delete</button>
            </div>
        `.trim();
    }

    function onAddTodo (ev) {
        const inpValue = $inp.value;

        if (inpValue.trim().length > 1) {
            addItem(inpValue);
            $inp.value = "";
        }

        ev.preventDefault();
    }

    function onListClick(ev) {
        var {target} = ev;
        var action = target.getAttribute("x-todo-action");

        if (action && action.trim() == "delete") {
            removeItem(target.dataset.todoId);
        }

    }

    function removeItem(id) {
        $elemToRemove = $list.querySelector(`[x-todo-item="${id}"]`);

        if ($elemToRemove) {
            $elemToRemove.remove();
        }

    }

    function addItem(value) {
        var $todoDom = document.createElement("div");

        ++id;
        $todoDom.innerHTML = tmplTodoItem({id, value});

        $list.appendChild($todoDom);
    }

    function listAll() {
        Model.getAll().then((data) => {
            data.forEach(todoItem => {
                var $todoDom = document.createElement("div");
                $todoDom.innerHTML = tmplTodoItem(todoItem);

                $list.appendChild($todoDom);
            });
        });
    }

    listAll();

    $form.addEventListener("submit", onAddTodo);
    $list.addEventListener("click", onListClick);
}(window.Model));