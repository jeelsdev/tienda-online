<select  {{ $attributes->merge(["class"=>"block p-2 mb-6 text-sm text-gray-900 border border-gray-300 
    rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-1/2"]) }} >
    {{ $slot }}
  </select>
