const TodoItem = ({ todo, toggleTodoCompleted }) => {

    const handleCheckboxChange = () => {
        toggleTodoCompleted(todo.date); // Call the function passed from TodoList
    };

    return (
        <li>
            <label className={todo.completed ? 'completed' : ''}>
                <input type="checkbox" checked={todo.completed} onChange={handleCheckboxChange} />
                {todo.title}
            </label>
        </li>
    )
}

export default TodoItem
