<x-filament-panels::page>
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($this->getWidgets() as $widget)
                @livewire($widget)
            @endforeach
        </div>
        
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                    مرحباً بك في لوحة تحكم سيراك
                </h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 dark:text-gray-400">
                    <p>يمكنك من خلال هذه اللوحة إدارة جميع جوانب موقع سيراك بما في ذلك المستخدمين والمنتجات والمشاريع.</p>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100">إدارة المستخدمين</h4>
                            <p class="text-sm text-blue-700 dark:text-blue-300 mt-1">إضافة وتعديل المستخدمين والأدوار والصلاحيات</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-green-900 dark:text-green-100">إدارة المنتجات</h4>
                            <p class="text-sm text-green-700 dark:text-green-300 mt-1">إضافة وتعديل منتجات سيراك</p>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                            <h4 class="font-medium text-purple-900 dark:text-purple-100">إدارة المشاريع</h4>
                            <p class="text-sm text-purple-700 dark:text-purple-300 mt-1">إضافة وتعديل مشاريع الشركة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
