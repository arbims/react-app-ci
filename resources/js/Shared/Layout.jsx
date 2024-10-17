import { Link } from "@inertiajs/react"
import Increment from "../Components/TodoList"

const Layout = ({children}) => {

    return (
        <div className="container" style={{marginBlock: '2rem'}}>
        <Increment></Increment>
        <Link href='/'>Home</Link>
        <Link href='/demo'>Demo</Link>
        <div>{children}</div>
        </div>
    )
}

export default Layout