<!DOCTYPE html>
<html>
<head>
    <title>TASK MANAGER</title>


    <style>
        :root {
            --bg: #f3f4f6;
            --card: #ffffff;
            --card-alt: #f9fafb;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
            --button: #111827;
            --button-hover: #374151;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 70px 20px 40px;
        }

        .brand {
            position: fixed;
            top: 18px;
            left: 20px;
            z-index: 10;
            color: var(--text);
            text-decoration: none;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: lowercase;
        }

        .container {
            max-width: 720px;
            margin: 0 auto;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 10px 30px rgba(17, 24, 39, 0.04);
        }

        h1 {
            color: var(--text);
            margin: 0 0 20px;
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: -0.04em;
            font-family: 'Times New Roman', Times, serif;
        }

        h2 {
            color: var(--text);
            margin: 24px 0 18px;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .add-button {
            display: inline-block;
            background: var(--button);
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: 600;
            margin-bottom: 12px;
            transition: background 0.2s ease;
        }

        .add-button:hover {
            background: var(--button-hover);
        }

        .task {
            background: var(--card-alt);
            border: 1px solid var(--border);
            padding: 18px 20px;
            margin-top: 16px;
            border-radius: 12px;
        }

        .task h3 {
            margin: 0 0 8px;
            font-size: 1.1rem;
        }

        .task p {
            margin: 8px 0;
            color: var(--muted);
        }

        .status {
            font-weight: 600;
            color: var(--text);
        }

        .task-actions {
            margin-top: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .edit {
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
        }

        .delete {
            background: #e5e7eb;
            color: var(--text);
            border: 1px solid var(--border);
            padding: 7px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .delete:hover {
            background: #d1d5db;
        }

        .quote-box {
            background: #f3f4f6;
            border: 1px solid var(--border);
            border-left: 4px solid #9ca3af;
            border-radius: 12px;
            padding: 14px 16px;
            margin: 18px 0 22px;
            color: var(--muted);
            font-style: italic;
            line-height: 1.5;
        }
    </style>
</head>



<body>

<a href="/" class="brand">desyenti</a>

<div class="container">

    <h1>TASK MANAGER</h1>

    <a href="/tasks/create" class="add-button">+ Add Task</a>

    <div class="quote-box">
        “Small steps every day make the big goals possible.”
    </div>

    <h2>My Tasks</h2>

    @if ($tasks->count() > 0)

        @foreach ($tasks as $task)

            <div class="task">

                <h3>{{ $task->task_name }}</h3>

                <p>{{ $task->description }}</p>

                <p class="status">
                    Status: {{ $task->status }}
                </p>

                <p>
                    Due Date: {{ $task->due_date }}
                </p>

                <a href="/tasks/{{ $task->id }}/edit" class="edit">
                    Edit
                </a>

                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete">
                        Delete
                    </button>
                </form>

            </div>

        @endforeach

    @else

        <p>No tasks yet.</p>

    @endif

</div>

</body>
</html>