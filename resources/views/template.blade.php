<x-layout.student :title="$title">
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    {{-- your code --}}

    <x-slot name="script">

    </x-slot>
</x-layout.student>

<x-layout.staff :title="$title">
    ppp
</x-layout.staff>
