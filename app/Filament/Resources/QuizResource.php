<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Filament\Resources\QuizResource\RelationManagers;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->unique(),
                        Select::make('question_id')
                            ->label('Add questions')
                            ->relationship('questions', 'question_text')
                            ->multiple()
                            ->required()
                            ->preload()
                            ->createOptionForm([
                                Card::make()
                                    ->schema([
                                        Select::make('category_id')->relationship('category', 'category_name'),
                                        TextInput::make('question_text')->label('Question'),
                                        Repeater::make('Answers')
                                            ->relationship('answers')
                                            ->minItems(2)
                                            ->maxItems(4)
                                            ->collapsible()
                                            ->cloneable()
                                            ->grid(2)
                                            ->schema([
                                                TextInput::make('answer_text'),
                                                Toggle::make('is_correct')
                                                    ->onColor('success')
                                                    ->offColor('danger')
                                                    ->onIcon('heroicon-o-check')
                                                    ->offIcon('heroicon-s-x')
                                            ])
                                            ->createItemButtonLabel('New answer'),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('created_at'),
                // SelectColumn::make('')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'view' => Pages\ViewQuiz::route('/{record}'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }
}
