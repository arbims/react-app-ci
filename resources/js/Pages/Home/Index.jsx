import React from 'react'

/**
 * This view component will be rendered when visiting /pages/greet
 * when your application has been setup with inertiajs.
 */
const Index = ({ name }) => {
    return (
        <>
            <h1>Hello world! <strong>{name}</strong></h1>
        </>
    );
}

export default Index