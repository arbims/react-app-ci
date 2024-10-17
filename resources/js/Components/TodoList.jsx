import { useState } from "react"
import TodoItem from "./TodoItem"

const TodoList = () => {

    const [newTodo, setNewTodo] = useState('')
    const [todos, setTodos] = useState([])
    const [hideCompleted, setHideCompleted] = useState(false)
    const [hideTodos, setHideTodos] = useState([])
    const handleChange = (event) => {
        setNewTodo((newTodo) => event.target.value)
    };

    const addTodo = (e) => {
        e.preventDefault()
        if (newTodo) {
            setTodos((todos) => [...todos, {
                title: newTodo,
                completed: false,
                date: Date.now()
            }])
            setNewTodo('')
            setTodos((todos) => todos.sort((a, b) => a.completed > b.completed ? 1 : -1 ))
        }
    }

    const findTodo = (title) => {
        return todos.find(todo => todo.title === title);
    }

    const toggleTodoCompleted = (date) => {
        setTodos((todos) => todos.map(todo =>
            todo.date === date ? { ...todo, completed: !todo.completed } : todo
        ));
        setTodos((todos) => todos.sort((a, b) => a.completed > b.completed ? 1 : -1 ))
        if (hideCompleted === true) {
            let todo = {...todos.find(todo => todo.date === date)}
            todo.completed = true
            setHideTodos((hideTodos) => [...hideTodos , todo])
            setTodos((todos) => todos.filter(t => t.completed == false))
        }
    };

    const updateListe = () => {
        if (!hideCompleted === true) {
            setTodos(todos.filter(t => t.completed == false))
            setHideTodos(todos.filter(t => t.completed == true))
        } else {
            setTodos((todos) => [ ...todos, ...hideTodos])
            setHideTodos([])
        }
    }
    
    const handlHideCompleted = () => {
        setHideCompleted((hideCompleted) => !hideCompleted)
        updateListe()
    }

    return (
        <>
            <form onSubmit={addTodo}>
                <fieldset role="group">
                    <input name="newTodo" placeholder="Ajouter une tache" value={newTodo} onChange={handleChange} />
                    <button>Ajouter</button>
                </fieldset>
            </form>
            <div>
                <ul>
                {todos.map(todo => (
                    <TodoItem todo={todo} key={todo.date} toggleTodoCompleted={toggleTodoCompleted}></TodoItem>
                ))}
                </ul>
                <label>
                    <input type="checkbox" checked={hideCompleted} onChange={handlHideCompleted}/>
                    Masquer les taches complete
                </label>
            </div>
        </>
    )
}

export default TodoList