import { Link } from "@inertiajs/react";

export default function Home({ name }) {
    return (
      <>
        <h1 className="title">Hallo {name} </h1>

        <Link preserveScroll href="/" className="block title mt-[1000px]">
        {new Date().toLocaleDateString()}</Link>
      </>
    );
}
 