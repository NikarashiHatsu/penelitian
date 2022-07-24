<x-app-layout>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button>logout</button>
    </form>
</x-app-layout>
