<div>
    <div class="table-responsive col-md-12" style="margin: 10px 0 10px;">
        <div>
            <table
                class="table power-grid-table table table-bordered table-hover table-striped table-checkable table-highlight-head mb-2"
                style="">
                <thead class="" style="">
                    <tr class="" style="">


                        <th class=" " wire:key="b068931cc450442b63f5b3d276ea4297"
                            style="; width: max-content;  white-space: nowrap;min-width: 50px;padding-left: 15px;font-size: 0.75rem;color: #6b6a6a;padding-top: 8px;padding-bottom: 8px; ">
                            <div class="">
                                <span>NAME</span>
                            </div>
                        </th>
                        <th class=" " wire:key="0c83f57c786a0b4a39efab23731c7ebc"
                            style="; width: max-content;  white-space: nowrap;min-width: 50px;padding-left: 15px;font-size: 0.75rem;color: #6b6a6a;padding-top: 8px;padding-bottom: 8px; ">
                            <div class="">
                                <span>EMAIL</span>
                            </div>
                        </th>
                        <th class=" " wire:key="c60879c6b41321704ee88fbc7b9a73e4"
                            style="; width: max-content;  white-space: nowrap;min-width: 50px;padding-left: 15px;font-size: 0.75rem;color: #6b6a6a;padding-top: 8px;padding-bottom: 8px; ">
                            <div class="">
                                <span>IS ADMIN</span>
                            </div>
                        </th>

                        <th class=" " scope="col"
                            style="white-space: nowrap;min-width: 50px;padding-left: 15px;font-size: 0.75rem;color: #6b6a6a;padding-top: 8px;padding-bottom: 8px;"
                            colspan="1" wire:key="ebb67a4271abe715344471b0f16321f6">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="" style="">
                    <tr class=" " style=" ">
                    </tr>



                    @if (count($users) > 0)


                        @foreach ($users as $user)
                            <tr>
                                <td class=" "
                                    style="; vertical-align: middle; line-height: normal;white-space: nowrap; ">
                                    <span class="">
                                        <div>
                                            {{ $user->name }}
                                        </div>
                                    </span>
                                </td>
                                <td class=" "
                                    style="; vertical-align: middle; line-height: normal;white-space: nowrap; ">
                                    <span class="">
                                        <div>
                                            {{ $user->email }}
                                        </div>
                                    </span>
                                </td>
                                <td class=" "
                                    style="; vertical-align: middle; line-height: normal;white-space: nowrap; ">
                                    <div>
                                        <div class="form-check form-switch">
                                            <label>
                                                <input class="form-check-input" type="checkbox"
                                                    @if ($user->is_admin) checked @endif>
                                            </label>
                                        </div>
                                    </div>

                                </td>


                                <td class="pg-actions "
                                    style="vertical-align: middle; line-height: normal;white-space: nowrap;">

                                    <div class="w-full md:w-auto">
                                        <button class="btn btn-danger" title=""
                                            wire:click="destroy({{ $user->id }})">
                                            Delete
                                        </button>



                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                No Users to display
                            </td>
                        </tr>
                    @endif


                </tbody>
            </table>
        </div>
    </div>
</div>
