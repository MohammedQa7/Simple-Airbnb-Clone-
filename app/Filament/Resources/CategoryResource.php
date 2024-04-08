<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Category information')
                ->schema([
                    TextInput::make('title')
                    ->required()
                    ->maxLength('255')
                    ->live()
                    ->afterStateUpdated(function($operation , $state , Forms\Set $set){
                        if($operation == 'edit'){
    
                        }else{
                            $set('slug' , Str::slug($state));
                        }
                    }),
    
                    TextInput::make('slug')
                    ->required()
                    ->maxLength('255')
                    ->unique(),
    
                    FileUpload::make('image')
                    ->disk('public')
                    ->directory('category/icons')
                    ->image()
                    ->required()
                    ->columnSpanFull()
                    ->maxFiles(1),
                ])

                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->searchable()
                ->sortable(),
                TextColumn::make('slug')
                ->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('created_at')
                ->sortable()
                ,

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
