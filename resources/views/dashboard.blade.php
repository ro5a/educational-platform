<x-app-layout>

    @if ($do == 'Manage')
    <x-table>
        <x-slot name='tableName'>عرض المستخدمين</x-slot>
        <x-slot name='button'>
            <a href="users?do=Add">
                <button class="btn btn-primary mb-3 text-nowrap add-new-user">
                    إضافة مستخدم
                </button>
            </a>
        </x-slot>
        <x-slot name='tableHead'>
            <th> # </th>
            <th> الاسم </th>
            <th> الايميل </th>
            <th> رقم الهاتف </th>
            <th>العمليات</th>
        </x-slot>
        <x-slot name='tableBody'>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td> <strong>{{ $user->name }}</strong></td>
                    <td> <strong>{{ $user->email }}</strong></td>
                    <td> <strong>{{ $user->phone }}</strong></td>

                    <td>

                        <a href="users?do=Edit&Id={{ $user->id }}" class="btn btn-icon btn-secondary"> <i
                                class="bx bx-edit-alt me-1"></i></a>


                    </td>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name='pagination'></x-slot>
    </x-table>
@elseif ($do == 'Add')
    {{-- Start Add users --}}
    <x-form action="{{ route('dashboard.add_user') }}">
        <x-slot name='title'> اضافة مستخدم</x-slot>
        <x-slot name='button'> </x-slot>
        <x-slot name='formInput'>
            <x-input value="{{ old('name') }}">
                <x-slot name="label_name">الاسم </x-slot>
                <x-slot name="field_name">name</x-slot>
                <x-slot name="placeholder">أدخل اسم المستخدم </x-slot>
            </x-input>
            <x-input value="{{ old('email') }}">
                <x-slot name="label_name">البريد الإلكتروني </x-slot>
                <x-slot name="field_name">email</x-slot>
                <x-slot name="placeholder">أدخل البريد الإلكتروني </x-slot>
            </x-input>
            <div class="form-group col-md-6 my-3">
                <label for="phone" class="form-label fs-6">رقم الهاتف</label>

                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                    placeholder="رقم الهاتف" class="form-control">
                @error('phone')
                    <span class="text-end text-danger">* {{ $message }} </span>
                @enderror
            </div>
            <div class="col-md-6 my-3">
                <label class="form-label fs-6" for="multicol-username"> كلمة المرور</label>
                <input name="password" type="password" placeholder="************" id="multicol-username"
                    class="form-control" />
                @error('password')
                    <span class="text-end text-danger">* {{ $message }} </span>
                @enderror
            </div>
            <div class="col-md-6 my-3">
                <label class="form-label fs-6" for="multicol-username">تاكيد كلمة المرور</label>
                <input name="confirm_password" type="password" placeholder="************" id="multicol-username"
                    class="form-control" />
                @error('confirm_password')
                    <span class="text-end text-danger">* {{ $message }} </span>
                @enderror
            </div>

        </x-slot>
        <x-slot name='action'>اضافة</x-slot>
        <x-slot name='route'>{{ route('dashboard.users') }}</x-slot>
    </x-form>
@elseif ($do == 'Edit')
    <x-form action="{{ route('dashboard.update_user', $user->id) }}">
        <x-slot name='title'> تعديل </x-slot>
        <x-slot name='button'>
        </x-slot>

        <x-slot name='formInput'>
            <x-input value="{{ $user->name }}">
                <x-slot name="label_name">الاسم </x-slot>
                <x-slot name="field_name">name</x-slot>
                <x-slot name="placeholder">أدخل اسم المستخدم </x-slot>
            </x-input>
            <x-input value="{{ $user->email }}" readonly>
                <x-slot name="label_name">البريد الإلكتروني </x-slot>
                <x-slot name="field_name"></x-slot>
                <x-slot name="placeholder">أدخل البريد الإلكتروني </x-slot>
            </x-input>
            <x-input value="{{ $user->phone }}" readonly>
                <x-slot name="label_name">رقم الهاتف </x-slot>
                <x-slot name="field_name">phone</x-slot>
                <x-slot name="placeholder">أدخل رقم الهاتف </x-slot>
            </x-input>
            <div class="col-md-6 my-3">
                <label class="form-label fs-6" for="multicol-username"> كلمة المرور</label>
                <input name="password" type="password" placeholder="************" id="multicol-username"
                    class="form-control" />
                @error('password')
                    <span class="text-end text-danger">* {{ $message }} </span>
                @enderror
            </div>
            <div class="col-md-6 my-3">
                <label class="form-label fs-6" for="multicol-username">تاكيد كلمة المرور</label>
                <input name="confirm_password" type="password" placeholder="************" id="multicol-username"
                    class="form-control" />
                @error('confirm_password')
                    <span class="text-end text-danger">* {{ $message }} </span>
                @enderror
            </div>

        </x-slot>
        <x-slot name='action'>تعديل</x-slot>
        <x-slot name='route'>{{ route('dashboard.users') }}</x-slot>
    </x-form>

    @endif

</x-app-layout>
